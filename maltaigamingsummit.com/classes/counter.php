<?

/** * Description of counter * * @author eric */
class counter {

    public $ip;
    public $agent;
    public $count;

    public function getIp() {
        return $this->ip;
    }

    public function setIp() {
        $this->ip = $_SERVER["REMOTE_ADDR"];
    }

    public function getAgent() {
        return $this->agent;
    }

    public function setAgent() {
        $this->agent = $_SERVER["HTTP_USER_AGENT"];
    }

    public function addHit($pageId) {
        $pageId = $_SESSION['page_id'];
        $db = new DB();
        $result = $db->query("INSERT INTO pagesHits (pages_id, pageHit_useragent, pageHit_ip) VALUES ('$pageId','$this->agent', '$this->ip')");
        return TRUE;
    }

    public function getHits() {
        $db = new DB();
        $count = array();
        $result2 = $db->query("SELECT pageDetails.page_id, pageDetails.pageDet_name  FROM pages JOIN pageDetails WHERE  pages.page_id=pageDetails.page_id");
        while ($row = $db->fetchData($result2)) {
            $pageId = $row['page_id'];
            $pageName = $row['pageDet_name'];
            $result = $db->query("SELECT COUNT(pageHit_ip) FROM pagesHits WHERE pages_id=$pageId");
            while ($visit = $db->fetchData($result)) {
                $count[] = array("pageId" => $pageId, "pageName" => $pageName, "pageHits" => $visit[0]);
            }
        } return $count;
    }
   public function __construct() {
        $this->count = $this->setAgent();
        $this->count = $this->setIp();
        //check if ip is in db
        if (isset($_SESSION['page_id'])) {
            $pageId = $_SESSION['page_id'];
            $db = new DB();
            $result = $db->query("SELECT pages_id, pageHit_ip FROM pagesHits WHERE pages_id='$pageId' AND pageHit_ip='$this->ip'");
            if ($db->numRows($result) == 0) {
                //add hit
                $this->addHit($pageId);
            }
        }


        return $this->count;
    }
}

?>
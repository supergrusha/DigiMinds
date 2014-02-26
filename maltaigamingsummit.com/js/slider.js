$(document).ready(function () {   
             
                      
                var posshow = 1;           
                var poshide = 0;          
                $(document).ready(function() {  
                    window.setTimeout(function() { slide() }, 5000)  
                });               
                function slide() {     
                    window.setTimeout(function() { slide() }, 5000)  
                    $(slides[poshide]).fadeOut(1000);  
                    $(slides[posshow]).fadeIn(1000);   
                    poshide++;              
                    posshow++;             
                    if(poshide == slides.length-1){          
                        poshide = 0;                      
                    }                     
                    if(posshow == slides.length-1){    
                        posshow = 0;               
                    }                        
                }                  
            });                
     


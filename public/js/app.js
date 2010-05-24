(function() {
    
    App = {
        
        Validate: function() {
            
            var productForm = $('#product-form');
            
            productForm.bind('submit', function() {
                var wasError = false;
                var requiredFields = productForm.find('.required');
                
                $.each(requiredFields, function(idx, element) {
                    
                    var el = $(element);  
                    var errorMsg = el.next('.error-msg');
                    
                    if(jQuery.trim(el.val()) === '')  {
                        
                        if(!el.hasClass('error')) {
                            el.addClass('error');
                        }

                        if(jQuery.trim(errorMsg.text()) === '' || jQuery.trim(errorMsg.text()) === 'Not a number') {

                            errorMsg.html(errorMsg.text() + ' Required ');
                        }
                        
                        wasError = true;
                    }
                    else {
                        
                        if(el.hasClass('error')) {
                            el.removeClass('error');
                            errorMsg.html('');
                        }
                    }
                });
                
                var numericFields = productForm.find('.numeric');
                
                $.each(numericFields, function(idx, element) {
                    
                    var el = $(element)    ;
                    var errorMsg = el.next('.error-msg');
                    
                    if(!/^\d+(\.|,){0,1}\d+$/.test(jQuery.trim(el.val()))) {
                        
                        if(!el.hasClass('error')) {
                            el.addClass('error');
                        }
                                                
                        if(jQuery.trim(errorMsg.text()) === '' || jQuery.trim(errorMsg.text()) === 'Required') {

                            errorMsg.html(errorMsg.text() + ' Not a number ');
                        }
                        wasError = true;
                    }
                    else {
                        
                        if(el.hasClass('error')) {
                            el.removeClass('error');
                            errorMsg.html('');
                        }
                    }                    
                });
                return !wasError;
            }); 
        }
    };  
    
    $(function() {
        
        App.Validate();    
    });    
}) ();
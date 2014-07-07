/**
 * Application JS
 */
$(document).ready(function() { 

    


(function() {


    var form = new ReptileForm('form', {
        validationError: function(err) {

            // Handle validatin errors any way you want
            this.el.before(JSON.stringify(err));

        },
        submitError: function(xhr, settings, thrownError) {
            
            // Handle server errors any way you want
            this.el.before('<p>Error From Server</p>');

        },
        submitSuccess: function(data) {
            
            // Handle successful submissions any way you want
            if (data.response) {
                this.el.before('<p>' + data.response + '</p>');
            } else if (data.redirect) {
                location.href = data.redirect;
            }

        }
    });

    $('.logOut').click(function(){

console.log('down here');


        $.ajax({
            url: 'logout_ajax.php', 
            data: {},
            success: function(data) {
                console.log(data.response)
                window.location="index.php";
                

            }

        });
       
        // window.location = 'index.php';

    });
        

    // $(function(){

    //     var renderMatchList = function(payload) {
    //       $('.listing').empty();
    //       var template = $('#user-media-object').html();
    //       var matchTemplate = Handlebars.compile(template);
    //       $('.listing').append(matchTemplate(payload));
    //   }

    //   renderMatchList(payload);



    // });



})();

});
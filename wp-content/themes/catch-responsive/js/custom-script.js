/**
 * Created by serfcompany on 03.04.17.
 */
$(document).ready(function(){
    $('.holder_img_menu_show').click(function(){

        var button = $('#main_horisontal_menu');

        if(!button.hasClass('dropdown-is-active')) {
            $('#main_horisontal_menu').addClass('dropdown-is-active');
        } else {
            $('#main_horisontal_menu').removeClass('dropdown-is-active');
        }
        });
});



/*$(document).ready(function(){
   var h = document.documentElement.clientWidth;

    if(h < 890){
        console.log($("div.vc_grid-item-mini"));

        $("div.vc_grid-item-mini").each(function(i, elem){
            $(elem).addClass("not-hover");
            alert($(elem).text());
            console.log(h);
        });
    }
});*/

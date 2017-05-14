/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

( function($) {
    
    var $menuTray = $("<div>", {id:"site-navigation-submenu", class:"menu-tray"});
    var $siteNav = $('#site-navigation');
    var $curpage = $('.current_page_item');
    var $hasChildren = $('.page_item_has_children');
    
    $('#primary-menu li:hover > ul').css("display", "none");
    
    $menuTray.css("display", "none"); // Hide Menu Tray by Default;
    $menuTray.appendTo($siteNav);

    // If the current page has menu sub-items
    if($curpage.hasClass('page_item_has_children')){
        //put them in the menu tray
        populateTray($curpage.find('ul.children'));
    }
    
    // Show or Hide the tray, as appropriate
    ToggleTrayByMediaQuery();
    
    // Repeat above test whenever window is resiezed.
    $(window).resize(function () {
        waitForFinalEvent(function(){
          //alert('Resize...');
          ToggleTrayByMediaQuery();

        }, 500, "Should I add a menu tray?");
    });
    
    function ToggleTrayByMediaQuery() {
        if($('.site-logo-area').css("float") === "none"){ 
            // show menu-tray if on tabletPlus media query size
            console.log("true");
            showTray();
        }else {
            console.log("false");
            hideTray();
        }  
    }
    
    
    function showTray(){
        
        $menuTray.slideDown();
        populateTray($curpage.find('ul.children'));
        
        
        
        // Show other item subitems on hover
        $hasChildren.hover(function(){
            populateTray($(this).find('ul.children'));
        });
        
    }
    
    function hideTray() {
        $menuTray.slideUp();
 
        // Remove above added listner
        $hasChildren.unbind('mouseenter mouseleave');
    }
    
    function populateTray($submenu) {
        if($menuTray.hasChildNodes){
            $menuTray.empty();
        }
        $submenu.clone().prependTo('.menu-tray');

    }
    
    
} )( jQuery );
/* 
 * Adds menu tray functionality.
 * Assumes navigation.js is already in play, so perhaps these two should be merged?
 */

( function($) {
    
    
    
    
    console.log("menu-tray.js active");
    var $menuTray = $("<div>", {id:"site-navigation-submenu", class:"menu-tray"});
    var $siteNav = $('#site-navigation');
    var $curpage = $siteNav.find('.current_page_item');
    var $hasChildren = $siteNav.find('.page_item_has_children, .menu-item-has-children');
    var $toggleButtons = $siteNav.find('.dropdown-toggle');
    var $lastClickedBtn = null;
    
    var trayEnabled = false;
    var trayOpen = false;
    var $curSubmenuDisplayed = $curpage;
    
    
    
    
    $('#primary-menu li:hover > ul').css("display", "none");
    
    $menuTray.css("display", "none"); // Hide Menu Tray by Default;
    $menuTray.appendTo($siteNav);
    
    // enable or disble the menu tray, determiend by queried page format
    toggleMenuTrayByMediaQuery();
    
    // Repeat above test whenever window is resized.
    $(window).resize(function () {
        waitForFinalEvent(function(){
          //alert('Resize...');
          toggleMenuTrayByMediaQuery();

        }, 500, "Should I add a menu tray?");
    });
    
    function toggleMenuTrayByMediaQuery() {
        if($('.site-logo-area').css("float") === "none"){ 
            // show menu-tray if on tabletPlus media query size
            if(!trayEnabled){
                console.log("Tablet or larger media query, showing menu tray");
                enableTray();
            }
            
        }else {
            if(trayEnabled){
                console.log("Mobile media query, hiding menu tray.");
                disableTray();
            }
        }  
    }
    
    
    function enableTray(){
        
        trayOpen = false; // Reinit tray openin case of page resize
        trayEnabled = true;
        
        $siteNav.find('.dropdown-symbol-text').hide();   // Hide default navigation symbols
        $toggleButtons.toggleClass('hamburger');         // Add hamburger symbol to dropdown toggle buttons
        
        
        // disable showing children when toggled on by navigation.js
        //$hasChildren.find('.children, .sub-menu').toggleClass("disabled", true);
          $hasChildren.find('ul').toggleClass("disabled", true);
  
        // If the current page has menu sub-items
        if(
            ( $curpage.hasClass('page_item_has_children') || $curpage.hasClass('menu_item_has_children') ) ||
            ( $curpage.hasClass('page-item-has-children') || $curpage.hasClass('menu-item-has-children') )
          ){
            //put them in the menu tray
            $curSubmenuDisplayed = $curpage;
            //console.log($curpage);
            
            initTray($curpage.find('> ul'));
        }else {
            console.log("$curpage has no class indicating children. \n $curpage.class = " + $curpage.attr("class"));
        }
        
        $toggleButtons.bind('click.hamburger', function( e ) {
            
            if ($lastClickedBtn !== null){
                $lastClickedBtn.parent().removeClass("menu-selection");
            }
            
            // Accounts for click on button text versus button. Ensures $target always refers to button instance.
            // console.log("Click Target: "+e.target.nodeName+" class= "+e.target.className);
            $lastClickedBtn = (e.target.nodeName === 'SPAN') ? $(e.target).parent() : $(e.target);
            $lastClickedBtn.parent().toggleClass("menu-selection");
            
            // If tray has already contains the submenu for the for the clicked button
            if($lastClickedBtn.parent().attr('class') === $curSubmenuDisplayed.attr('class')){
                // Toggle visibilty of menu tray
                // console.log("selected item's submenu already active, toggling visibility");
               // $lastClickedBtn.parent().toggleClass("menu-selection");
                toggleTray();
            }else {
                // otherwise reinitilize menu tray
                // console.log("selected new item, reinit menu tray");
                initTray($lastClickedBtn.siblings('ul'));

            }
        });
        
    }
    
    function disableTray() {
        // Remove listeners added by enableTray
        $toggleButtons.unbind('click.hamburger');
        

        // Remove hamburger symbol from dropdown toggle buttons
        $toggleButtons.removeClass('hamburger');         
        
        // Restore visibility to default button text 
        $siteNav.find('.dropdown-symbol-text').show();
        
        // enable showing children when toggled on by navigation.js 
        $hasChildren.find('ul').removeClass("disabled");
        
        $menuTray.slideUp();
        
        trayEnabled = false;
        
    }
    
    function initTray($submenu) {
        /*
         * Checks if tray is already open. If so, slides it up before populating.
         */
        
        //console.log("Menu tray is open: "+trayOpen);
        
        $menuTray.slideUp(function () {
            trayOpen = false;
            populateTray($submenu);
        });
        
        
        function populateTray($submenu) {
            /*
             * Empties tray of any contents, then fills it with supplied element and slides it down.
             * Should only be called by initTray.
             */

            $menuTray.empty();                          //empty menu tray in case has existing submenu
            console.log("populating menu tray");

            $curSubmenuDisplayed = $submenu.parent();   //update reference to current submenu
            $submenu.clone().prependTo('.menu-tray');   //copy current submenu to menu tray
            toggleTray();                               //slide down the menu tray if hidden
        }
    }
   
    
    function toggleTray(complete){
        /*
         * Toggle tray visibility without changing contents.
         */
        
        if(trayOpen){
            trayOpen = false;
            $menuTray.slideUp(complete);
        }else{  
            trayOpen = true;
            $menuTray.slideDown(complete);
        }
    }
    
    
} )( jQuery );  
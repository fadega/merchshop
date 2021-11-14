 
 window.addEventListener('DOMContentLoaded', (event) => {
    // console.log('DOM fully loaded and parsed');

    // "use strict";

    //carousel for home page featured and may-like sections

		$('.owl-carousel').owlCarousel({
		    items:4,
		    lazyLoad:true,
		    loop:false,
		    dots:true,
		    margin:20,
		    responsiveClass:true,
			    responsive:{
			        0:{
			            items:1,
			        },
			        600:{
			            items:2,
			        },
			        1000:{
			            items:4,
			        }
			    }
		});

		/* activate jquery isotope */
		 var $container = $('.posts').isotope({
		    itemSelector : '.item',
		    isFitWidth: true
		  });

		  $(window).smartresize(function(){
		    $container.isotope({
		      columnWidth: '.col-sm-3'
		    });
		  });
		  
		  $container.isotope({ filter: '*' });

		    // filter items on button click
		  $('#filters').on( 'click', 'button', function() {
		    var filterValue = $(this).attr('data-filter');
		    $container.isotope({ filter: filterValue });
		});


		$('#carousel').flexslider({
		    animation: "slide",
		    controlNav: false,
		    animationLoop: false,
		    slideshow: false,
		    itemWidth: 210,
		    itemMargin: 5,
		    asNavFor: '#slider'
		});
		 
		$('#slider').flexslider({
		    animation: "slide",
		    controlNav: false,
		    animationLoop: false,
		    slideshow: false,
		    sync: "#carousel"
		});

		// For single product page 
		
		$("#single-product-slider").owlCarousel({
			// items:2,
			// itemsDestop:[1119,1],
			// itemsDestopSmall:[980,1],
			// itemsMobile:[780],
			// pagination:false,
			// navigation:true,
			// navigationTexxt:["",""],
			// autoplay:true,
			// loop:false
	
		})
 

    }); // document is loaded

//loop and change the active link

$(function(){
	$('#dashboardlinks li a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
	$('#dashboardlinks li a').click(function(){
		$(this).parent().addClass('active').siblings().removeClass('active')    
	})
})

$(function(){
	$('#navbarResponsive li a').filter(function(){return this.href==location.href}).parent().addClass('active').siblings().removeClass('active')
	$('#navbarResponsive li a').click(function(){
		$(this).parent().addClass('active').siblings().removeClass('active')    
	})
})




/* Admin scriopt starts here */

//hide-show categories

function showCategory(){
    
    let cname = document.getElementById("category-left")
    if(cname.classList.contains("d-none")){
        cname.classList.remove("d-none")
        cname.classList.add("d-block")

    }else if(cname.classList.contains("d-block")){
        cname.classList.remove("d-dblock")
        cname.classList.add("d-none")

    }
  
            // Get the container element
        var list = document.getElementById("dashboardlinks");

        // Get all buttons with class="btn" inside the container
        // var btns = list.getElementsByClassName("btn");
        var items = list.getElementsByTagName("a")
        console.log(items);

        // Loop through the buttons and add the active class to the current/clicked button
        for (var i = 0; i < items.length; i++) {
            items[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
        } 

        //view-categories
        var txt = document.getElementById("view-categories").textContent;
        if(txt ==="View Categories"){
            txt.innerHTML="Go Back"
        }else if(txt ==="Go Backs"){
            txt.innerHTML="View Categories"
        }

        var txt = document.getElementById("view-categories");
        txt.addEventListener("click", function(){
            txt.classList.add("d-none")
        })

}


//example from chart.js 

var ctx = document.getElementById('sales').getContext('2d');
var ch = new Chart(ctx, {
    type: 'line',
    data: {
        lab: ['Jan', 'Feb', 'March', 'April', 'May', 'July'],
        datasets: [{
            label: 'Sales trend Jan - July 2021',
            data: [120, 75, 150, 600, 450, 1800],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            },
			label:{
				display:false
			}
        }
    }
});



var ctx = document.getElementById('customervisitor').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Buyers', 'Visitors',],
        datasets: [{
            label: '# of buyers',
            data: [200, 2000],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
               
            ],
            borderWidth: 1
        }]
    },
	
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});









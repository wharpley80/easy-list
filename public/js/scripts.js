$(function() {

  // Initialize tooltipster on signin-form input/password elements
  $('.signin-form input[type="text"], .signin-form input[type="password"]').tooltipster({ 
    trigger: 'custom', // default is 'hover' which is no good here
    onlyOne: false,    // allow multiple tips to be open at a time
    position: 'right'  // display the tips to the right of the element
  });

  $(".signin-form").validate({
    rules: {
      username: {
        required: true
      },
      password: {
        required: true
      }
    },  
    messages: {
      username: {
        required: "Username Required"   
      },
      password: {
        required: "Password Required"
      }
    },
    errorPlacement: function (error, element) {
      $(element).tooltipster('update', $(error).text());
      $(element).tooltipster('show');
      $('#signIn').on('hidden.bs.modal', function () {
        $(element).tooltipster('hide');
      });
    },
    success: function (label, element) {
      $(element).tooltipster('hide');
    }
  });

  // Initialize tooltipster on signup-form input/password elements
  $('.signup-form input[type="email"], .signup-form input[type="text"], .signup-form input[type="password"]').tooltipster({ 
    trigger: 'custom', // default is 'hover' which is no good here
    onlyOne: false,    // allow multiple tips to be open at a time
    position: 'right'  // display the tips to the right of the element
  });

  $(".signup-form").validate({
    rules: {
      email: {
        required: true
      },
      username: {
        required: true,
        minlength: 5, 
        maxlength: 20
      },
      password: {
        required: true,
        minlength: 6
      }
    },  
    messages: {
      email: {
        required: "Email Required"     
      },
      username: {
        required: "Username Required",
        minlength: "5 Characters Required",
        maxlength: "20 Characters Max"
      },
      password: {
        required: "Password Required",
        minlength: "6 Characters Required"
      }
    },
    errorPlacement: function (error, element) {
      $(element).tooltipster('update', $(error).text());
      $(element).tooltipster('show');
      $('#signUp').on('hidden.bs.modal', function () {
        $(element).tooltipster('hide');
      });
    },
    success: function (label, element) {
      $(element).tooltipster('hide');
    }
  });

 // Initialize tooltipster on item-form input/password elements
  $('.item-form input[type="text"]').tooltipster({ 
    trigger: 'custom', // default is 'hover' which is no good here
    onlyOne: false,    // allow multiple tips to be open at a time
    position: 'right'  // display the tips to the right of the element
  });

  $(".item-form").validate({
    rules: {
      list: {
        required: true,
      }
    },  
    messages: {
      list: {
        required: "Select List",     
      }
    },
    errorPlacement: function (error, element) {
      $(element).tooltipster('update', $(error).text());
      $(element).tooltipster('show');
    },
    success: function (label, element) {
      $(element).tooltipster('hide');
    }
  });

  // Tooltipster Validation for Editing a Username
  $('.edit-name input[type="text"]').tooltipster({ 
    trigger: 'custom', // default is 'hover' which is no good here
    onlyOne: false,    // allow multiple tips to be open at a time
    position: 'right'  // display the tips to the right of the element
  });

  $(".edit-name").validate({
    rules: {
      name: {
        required: true
      }
    },  
    messages: {
      name: {
        required: "Enter Email"     
      }
    },

    errorPlacement: function (error, element) {
      $(element).tooltipster('update', $(error).text());
      $(element).tooltipster('show');
    },
    success: function (label, element) {
      $(element).tooltipster('hide');
    }
  });

  // Tooltipster Validation for Share Email
  $('.share-email input[type="email"]').tooltipster({ 
    trigger: 'custom', // default is 'hover' which is no good here
    onlyOne: false,    // allow multiple tips to be open at a time
    position: 'right'  // display the tips to the right of the element
  });

  $(".share-email").validate({
    rules: {
      email: {
        required: true
      }
    },  
    messages: {
      email: {
        required: "Enter Email"
      }
    },

    errorPlacement: function (error, element) {
      $(element).tooltipster('update', $(error).text());
      $(element).tooltipster('show');
    },
    success: function (label, element) {
      $(element).tooltipster('hide');
    }
  });

  $(window).load(function(){
    $('#authorize').modal('show');
  });

  $(window).load(function(){
    $('#register').modal('show');
  });

  $(window).load(function(){
    $('#createList').modal('show');
  });

  $(window).load(function(){
    $('#shareList').modal('show');
  });

  $(window).load(function(){
    $('#editList').modal('show');
  });

  $(window).load(function(){
    $('#editName').modal('show');
  });

  // Deletes a User's Account
  $('#deleteName').on('click', function(event) {
    if (!confirm("Are you sure you want to Delete your Account?")) {
      event.preventDefault();
    }
  });

  // Deletes a Specific List
  $('#deleteList').on('click', function(event) {
    if (!confirm("Are you sure you want to Delete this List?")) {
      event.preventDefault();
    }
  });

  // Edit Username pop-up
  $(function() {
  function deselect(j) {
    $('.tog').slideFadeToggle(function() {
      j.removeClass('selected');
    });    
  }
 
  $('#changename').on('click', function(event) {
    event.preventDefault();

    if($(this).hasClass('selected')) {
       deselect($(this));               
    } else {
       $(this).addClass('selected');
       $('.tog').slideFadeToggle();
    }    
  });
  
  $('.close').on('click', function(event) {
    event.preventDefault();
    deselect($('#changename'));
   });
});

$.fn.slideFadeToggle = function(easing, callback) {
  return this.animate({ opacity: 'toggle', height: 'toggle' }, 'fast', easing, callback);
};

  // Clears a User's entire list.
  $('a#clear').on('click', function(event) {
    event.preventDefault();
    
    if (confirm("Are you sure you want to clear your list?")) {
      var items = $('h1').closest('div');
      var id = items.find('span').data('id');
      var clr = $('h2').closest('div');
      var lis = clr.find('span').data('lis');
      $('.fulllist').fadeOut();
    
      $.ajax({
        type: "POST",
        url: "../delete_items.php",
        data: {
          id: id,
          lis: lis
        },
      });
     } 
   }); 
   
  // Removes a specific item.
  $('a.byebye').on('click', function( event ) {
    event.preventDefault();
    
    var parent = $(this).closest('div');
    var id = parent.find('span').data('id');
    parent.fadeOut();

    $.ajax({
      type: "POST",
      url: "../delete_row.php",
      data: {
        id: id
      },
    });
  });  
});




// Deletes Username from list.
$(function() {
  $('a#deletename').on('click', function(event) {
    event.preventDefault();
  
    if (confirm("Are you sure you want to delete this shopper?")) {
      var erase = $('h1').closest('div');
      var ids = erase.find('span').data('id');
      
      $.ajax({
        type: "POST",
        url: "../delete_name.php",
        data: {
          ids: ids
        },	
		    success: function() {
		      window.location.href = '../signin/';
		    }
      });
    }
  });
});


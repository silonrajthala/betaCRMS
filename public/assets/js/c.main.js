$(document).ready(function() {

    function showLoadingModal() {
        $('#loadingModal').show();
    }
    // Function to hide the loading modal
    function hideLoadingModal() {
        $('#loadingModal').hide();
    }
    // Listen for the 'beforeunload' event to catch when the user is navigating away
    $(window).on('beforeunload', function() {
        showLoadingModal();
    });
    $(window).on('unload', function() {
        hideLoadingModal();
    });


});

$(document).off('click','#profile',function(){});
$(document).on('click','#profile',function(e){
    e.preventDefault();
    $('#profileModal').modal('show');
    let userObject = JSON.parse($(this).attr('data-user'));
    $('#nameUser').text('Name: ' + userObject.fname +' '+ userObject.lname);
    $('#emailUser').text('Email: ' + userObject.email);
    $('#numberUser').text('Mobile No: ' + userObject.mobilenumber);
    $('#usernameUser').text('Username: ' + userObject.username);

    // console.log(username);

})

function ajaxRequest(dataurl,postdata,type='POST',isformupload=false)
{
    $('#loader').show();
    let config={
        type: type,
        url: dataurl,
        dataType: 'json',
        data: postdata,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       
    };
    if(isformupload===true)
    {
        config.processData=false;
        config.contentType=false;
        config.cache=false;
    }
    return $.ajax(config);
    

}

function getRequest(dataurl)
{
    return $.ajax({
        type: 'GET',
        url: dataurl,
        dataType: 'json',
    
    });
}

function showNotification(message,type)
{
    if(type=='error')
    {
        type='danger';
    }
        var duration = '3000';
        var ripple = true;
        var dismissible = true;
        var positionX = 'right';
        var positionY = 'top';
        window.notyf.open({
            type,
            message,
            duration,
            ripple,
            dismissible,
            position: {
                x: positionX,
                y: positionY
            }
        });
}
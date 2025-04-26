$(document).on('click','.permission_chk',function(e){
    let module_usertype=$(this).val();
    let checked='N';
    if($(this).prop('checked')===true)
    {
        checked='Y';
    }
   
  
    setpermission(module_usertype,checked);

})


function setpermission(module_usertype,checked)
{
    let dataurl='permission';
    let token=$("input[name='_token']").val();

    var request = ajaxRequest(dataurl,{module_usertype,_token:token,checked:checked});
		request.done(function (res) {
            if(res.status===true)
            {
                showNotification(res.message,'success')
               

            }
            else
            {
                showNotification(res.message,'error')

            }
			
		});
}

$(document).on('change','#parentmenu',function(e){
    e.preventDefault();
    let menuid=$(this).val();
    let dataurl='permission/getSubmenuData';
    let token=$("input[name='_token']").val();
    var request = ajaxRequest(dataurl,{menuid:menuid,_token:token},'POST');
		request.done(function (res) {
            $('.table-body').empty();
            $('.table-body').html(res.response);
			
		});
})

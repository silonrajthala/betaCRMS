$(document).on('change','#formmenu',function(e){
    e.preventDefault();
    let usergroupid=$(this).val();
    let dataurl='getUsergroupWiseFormMenuData';
    let token=$("input[name='_token']").val();
    var request = ajaxRequest(dataurl,{usergroupid:usergroupid,_token:token},'POST');
		request.done(function (res) {
            $('.table-body').empty();
            $('.table-body').html(res.response);
			
		});
})

$(document).on('click','.permission_chk',function(e){
      let formname=$(this).val();
      let checked='N';
      if($(this).prop('checked')===true)
      {
          checked='Y';
      }
     
    
      setpermission(formname,checked);
  
  })
  
  
  function setpermission(formname,checked)
  {
      let dataurl='setformpermission';
      let token=$("input[name='_token']").val();
      let usergroup=$('#formmenu').val();
  
      var request = ajaxRequest(dataurl,{formname,usergroup,_token:token,checked:checked});
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

var AddressList =  {
getProvinceOptionList: function(param_geo_id){
        var frm_action = site_url('Register/get_province_list');
        var fdata = 'geo_id=' + param_geo_id
        fdata += '&' + crf_token_name + '=' + $.cookie(csrf_cookie_name);
        $.$.ajax({
            type: "POST",
            url: frm_action,
            data: fdata,
            success: function (results) {
                $('#District').html(results);
                setDropdownList('#District');
                
            },
            error : function(jqXHR, exception){
                ajaxErrorMessage(jqXHR, exception);
            }
        });
}
}
$(document).ready(function(){
    $(document).on('change','#Proviance', function(){
        AddressList.getProvinceOptionList(this);
    });
});


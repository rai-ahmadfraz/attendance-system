$(document).ready(function(){

    $("#punch_in_btn").click(function(event){
        event.preventDefault();
        var now = new Date(Date.now());
        $("#punch_in_hour").val(now.getHours());
        $("#punch_in_hour").attr('readonly','true');
        $("#punch_in_minutes").val(now.getMinutes());
        $("#punch_in_minutes").attr('readonly','true');
    });
    
    $("#punch_out_btn").click(function(event){
        event.preventDefault();
        var punch_in_hours = $("#punch_in_hour").val();
        if(punch_in_hours){
        var now = new Date(Date.now());
        $("#punch_out_hour").val(now.getHours());
        $("#punch_out_hour").attr('readonly','true');
        $("#punch_out_minutes").val(now.getMinutes());
        $("#punch_out_minutes").attr('readonly','true');
        }
    });
});
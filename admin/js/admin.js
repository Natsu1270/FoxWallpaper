$(document).ready(function(){
    $("#3d").on('click',()=>{$("#3d_table").fadeToggle()});
    $("#anime").on('click',()=>$("#anime_table").fadeToggle());
    $("#bike").on('click',()=>$("#bike_table").fadeToggle());
    $("#landscape").on('click',()=>$("#landscape_table").fadeToggle());
    $("#girl").on('click',()=>$("#girl_table").fadeToggle());


    $("#cat_select").change(function() {
        $("#cat_id").val($(this).val());
    }).change(); 
})
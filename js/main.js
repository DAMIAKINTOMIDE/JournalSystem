$("#new-note").on("click",function(){
   
   $("#note-text").text("");
   $("#card-body").html("<textarea type='text' rows='10' cols='10' class='form-control border-0' name='note-text'></textarea>");
  
});

    $("#search_note").on("click",function(){

        $("#all").addClass("d-none");
    
    });

   
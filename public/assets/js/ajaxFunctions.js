// function to see announcement list
function showAnnouncement(){
    $.ajax({url: 'announcementList'}
        ).done(function(response){
            $("#annSection").html(response)
        })
}


//function when an announcement is clicked
function showAnnDetails(annUrl){

    $.ajax({url: annUrl}
    ).done(function(response){
        $("#annSection").html(response)
    })
}
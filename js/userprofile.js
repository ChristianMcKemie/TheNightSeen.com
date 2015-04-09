$(document).ready(

function (e) {


// Function to preview image after validation
$(function() {
$("#file").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","white");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '75px');
$('#previewing').attr('height', '75px');
};
});

function changetodeletedialog(id) {
        
	    var deletedata = document.querySelector('#delete-'+id);
		
        var output = 
'Delete this review? <span onclick="deletereview('+deletedata.dataset.reviewid+');" id="deleteyes-'+deletedata.dataset.reviewid+'" data-uid="'+deletedata.dataset.uid+'" data-reviewid="'+deletedata.dataset.reviewid+'"  style="color:#3c763d; cursor:pointer;">yes</span>|'
+
'<span onclick="canceldelete('+deletedata.dataset.reviewid+');" id="deleteno-'+deletedata.dataset.reviewid+'" data-uid="'+deletedata.dataset.uid+'" data-reviewid="'+deletedata.dataset.reviewid+'"  style="color:red; cursor:pointer;">no</span>';
        
	document.getElementById('deletebox-'+id).innerHTML=output;
            };

function canceldelete(id) {
        
	    var deletedata = document.querySelector('#deleteno-'+id);
		
        var output = '<span onclick="changetodeletedialog('+deletedata.dataset.reviewid+');" id="delete-'+deletedata.dataset.reviewid+'" data-uid="'+deletedata.dataset.uid+'" data-reviewid="'+deletedata.dataset.reviewid+'" style="cursor:pointer;"><i class="fa fa-times"></i></span>';
        
	document.getElementById('deletebox-'+id).innerHTML=output;
            };



function deletereview(id)
{
        
	    var favoritedata = document.querySelector('#deleteyes-'+id);
		
	$.ajax({
            type: 'get',
            url: "http://thenightseen.com/review/delete",
         	cache: false,
			crossDomain: false,
			data: {
			
			review_id: favoritedata.dataset.reviewid,
			user_id: favoritedata.dataset.uid
			
			
			},
            success: function success () {
			
        var output = '<i style="color:#3c763d;" class="fa fa-check"></i> Review Successfully Deleted';
        
		document.getElementById(id).innerHTML=output;
            },
            error: function error() {
        var output = 'Error Processing Request';        
		document.getElementById(id).innerHTML=output;
            }
        });

};



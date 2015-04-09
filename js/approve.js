function changetoapprovedialog(id) {
        
	    var approvedata = document.querySelector('#approve-'+id);
		
        var output = 
'approve this review? <span onclick="approvereview('+approvedata.dataset.reviewid+');" id="approveyes-'+approvedata.dataset.reviewid+'" data-uid="'+approvedata.dataset.uid+'" data-reviewid="'+approvedata.dataset.reviewid+'"  style="color:#3c763d; cursor:pointer;">yes</span>|'
+
'<span onclick="cancelapprove('+approvedata.dataset.reviewid+');" id="approveno-'+approvedata.dataset.reviewid+'" data-uid="'+approvedata.dataset.uid+'" data-reviewid="'+approvedata.dataset.reviewid+'"  style="color:red; cursor:pointer;">no</span>';
        
	document.getElementById('approvebox-'+id).innerHTML=output;
            };

function cancelapprove(id) {
        
	    var approvedata = document.querySelector('#approveno-'+id);
		
        var output = '<span onclick="changetoapprovedialog('+approvedata.dataset.reviewid+');" id="approve-'+approvedata.dataset.reviewid+'" data-uid="'+approvedata.dataset.uid+'" data-reviewid="'+approvedata.dataset.reviewid+'" style="cursor:pointer;"><i class="fa fa-check"></i></span>';
        
	document.getElementById('approvebox-'+id).innerHTML=output;
            };



function approvereview(id)
{
        
	    var favoritedata = document.querySelector('#approveyes-'+id);
		
	$.ajax({
            type: 'get',
            url: "http://thenightseen.com/review/approve",
         	cache: false,
			crossDomain: false,
			data: {
			
			review_id: favoritedata.dataset.reviewid,
			user_id: favoritedata.dataset.uid
			
			
			},
            success: function success () {
			
        var output = '<i style="color:#3c763d;" class="fa fa-check"></i> Review Successfully approved';
        
		document.getElementById(id).innerHTML=output;
            },
            error: function error() {
        var output = 'Error Processing Request';        
		document.getElementById(id).innerHTML=output;
            }
        });

};
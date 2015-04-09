
function favorite() {
        
	    var favoritedata = document.querySelector('#favorite');
		
	$.ajax({
            type: 'get',
            url: "http://thenightseen.com/favorite/add",
         	cache: false,
			crossDomain: false,
			data: {
			
			city: favoritedata.dataset.city,
			club_id: favoritedata.dataset.clubid,
			user_id: favoritedata.dataset.userid
			
			
			},
            success: function success () {
			
        var output = '<span onclick="unfavorite();" id="unfavorite" data-userid="'+favoritedata.dataset.userid+'" data-clubid="'+favoritedata.dataset.clubid+'" data-city="'+favoritedata.dataset.city+'" style="float:right; color:white; cursor:pointer;"><i class="fa fa-heart-o fa-fw"></i> unfavorite</span>';
        
		document.getElementById("favoritebtn").innerHTML=output;
            },
            error: function error() {
        var output = '<span onclick="favorite();" id="favorite" data-userid="'+favoritedata.dataset.userid+'" data-clubid="'+favoritedata.dataset.clubid+'" data-city="'+favoritedata.dataset.city+'" style="float:right; color:white; cursor:pointer;"><i class="fa fa-heart fa-fw"></i> favorite</span>';
        
		document.getElementById("favoritebtn").innerHTML=output;
            }
        });
	
		
		
  
};

function unfavorite() {

        
	    var favoritedata = document.querySelector('#unfavorite');
		
		$.ajax({
            type: 'get',
            url: "http://thenightseen.com/favorite/remove",
         	cache: false,
			crossDomain: false,
			data: {
			
			city: favoritedata.dataset.city,
			club_id: favoritedata.dataset.clubid,
			user_id: favoritedata.dataset.userid
			
			
			},
            success: function success () {
			        
        var output = '<span onclick="favorite();" id="favorite" data-userid="'+favoritedata.dataset.userid+'" data-clubid="'+favoritedata.dataset.clubid+'" data-city="'+favoritedata.dataset.city+'" style="float:right; color:white; cursor:pointer;" class=""><i class="fa fa-heart fa-fw"></i> favorite</span>';
		document.getElementById("favoritebtn").innerHTML=output;
            },
            error: function error() {
         var output = '<span onclick="unfavorite();" id="unfavorite" data-userid="'+favoritedata.dataset.userid+'" data-clubid="'+favoritedata.dataset.clubid+'" data-city="'+favoritedata.dataset.city+'" style="float:right; color:white; cursor:pointer;" class=""><i class="fa fa-heart-o fa-fw"></i> unfavorite</span>';
        
		document.getElementById("favoritebtn").innerHTML=output;
            }
        });
		
		
		
		
  
}
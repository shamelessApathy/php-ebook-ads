$(function(){
	function AdTemplate(element){
		var element = element;
		this.init = function(element)
		{
			var element = element;
			var modal = $(element).find('.ad-modal');
			console.log('running init function');
			console.log(modal);
		}
		this.init();
	}

var templates = document.getElementsByClassName('ad-temp');
for (var i = 0; i < templates.length; i++)
{
	new AdTemplate(templates[i]);
}
})
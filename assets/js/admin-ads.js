$(function(){
	function AdTemplate(element){
		this.element = element;
		this.adModal;
		this.init = function(element)
		{
			var element = element;
			console.log('running init function');
			var modal = $(element).children('.ad-modal');
			console.log(modal);
			this.adModal = modal;
		}
		this.showModal = function()
		{
			console.log('inside showModal');
			console.log(this.adModal);
			$(this.adModal).css({"display":"block"});
		}.bind(this)
		this.listeners = function()
		{
			$(this.element).on('click', this.showModal);
		}
		this.init(this.element);
		this.listeners();
	}

var templates = document.getElementsByClassName('ad-temp');
for (var i = 0; i < templates.length; i++)
{
	new AdTemplate(templates[i]);
}
})
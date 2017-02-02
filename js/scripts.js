$(function(){
	$(document).ready(function(){
	
		$('button.delete', this).click(function(){
			var id = $(this, '.delete').attr('id');
			file = $('td.name_' + id).html();
			$('.hover').toggle();

			$('.hover .hide-name').val( file );
			$('.hover .hide-id').val( id );
			$('.hover span span.file').html( file );
			console.log('Press delete button id: ' +  id + ' ' + file );
		});

		$('button.reset').click(function(){
			$('.hover').toggle();
		});

		$('button.menu').click(function(){
			$('aside').toggle();
		});

		$('button.close-menu').click(function(){
			$('aside').toggle();
		});

	});
});
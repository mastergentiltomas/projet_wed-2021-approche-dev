$(function(){

  let offsetMore = 5
  let baseUrl = $('body').attr('data-baseURL');

  $('#older-posts').click(function(e){
    e.preventDefault();
      $.ajax({
        url: baseUrl,
        data: {
          offset: offsetMore
        },
        method: 'get',
        success: function(reponsePHP){
          $('#liste-posts').append(reponsePHP).find('.post-preview:nth-last-of-type(-n+10)').hide().fadeIn();
          offsetMore = offsetMore + 5;
        },
        error: function(){
          alert('probleme');
        }
      });
  });
});

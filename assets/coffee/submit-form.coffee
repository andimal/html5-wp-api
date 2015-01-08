$('.js-form').on 'submit', ->
  $.post document.URL, $(this).serialize(), (data) ->
    $('.js-target').text data
  false

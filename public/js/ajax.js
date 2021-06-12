//companies search

$('.company').select2({
    placeholder: $('.company').attr("id"),
  ajax: {
    url: '/company/search',
    data: function (params) {
            return {
                search: params.term,
            };
      // Query parameters will be ?search=[term]&page=[page] البحر
    },success : function (params) {
        var options = '';
        //alert(result)
        for(var i=0; i<params.length; i++) { // Loop through the data & construct the options
            options += '<option value="'+params[i].id+'">'+params[i].name_ar+'</option>';
        }
        // Append to the html
        $('.company').html(options);
        //$('.results').html(options);
        //console.log(options);
    },
},
    cache: true
});

//groups search

$('.group').select2({
    placeholder: $('.group').attr("id"),
  ajax: {
    url: '/equipment_group/search',
    data: function (params) {
            return {
                search: params.term,
            };
      // Query parameters will be ?search=[term]&page=[page] البحر
    },success : function (params) {
        var options = '';
        //alert(result)
        for(var i=0; i<params.length; i++) { // Loop through the data & construct the options
            options += '<option value="'+params[i].id+'">'+params[i].name+'</option>';
        }
        // Append to the html
        $('.group').html(options);
    },
},
    cache: true
});

//status search

$('.status').select2({
    placeholder: $('.status').attr("id"),
  ajax: {
    url: '/equipment_status/search',
    data: function (params) {
            return {
                search: params.term,
            };
      // Query parameters will be ?search=[term]&page=[page] البحر
    },success : function (params) {
        var options = '';
        //alert(result)
        for(var i=0; i<params.length; i++) { // Loop through the data & construct the options
            options += '<option value="'+params[i].id+'">'+params[i].name+'</option>';
        }
        // Append to the html
        $('.status').html(options);
    },
},
    cache: true
});

//site search

$('.site').select2({
    placeholder: $('.site').attr("id"),
  ajax: {
    url: '/site/search',
    data: function (params) {
            return {
                search: params.term,
            };
      // Query parameters will be ?search=[term]&page=[page] البحر
    },success : function (params) {
        var options = '';
        //alert(result)
        for(var i=0; i<params.length; i++) { // Loop through the data & construct the options
            options += '<option value="'+params[i].id+'">'+params[i].name+'</option>';
        }
        // Append to the html
        $('.site').html(options);
    },
},
    cache: true
});




$('form[name="test_csrf"]').submit(function (e) {
    e.preventDefault();
    axios.post($(this).attr('action'), $(this).serialize()).then(r => alert(r.data.message));
});
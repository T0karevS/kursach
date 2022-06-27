$('.form').load(function myajax(e){
    e.preventDefault();
    let th=$(this);
    let btn = th.find('.button1');

        $.ajax({
            url: '../adminpage.php',
            method: 'POST',
            dataType: 'html',
            data: th.serialize(),
            success: function(data){
                alert('asda');
                setInterval(myajax,  1000);
                document.querySelector(".news-block").innerHTML = data;
            }

        })
});
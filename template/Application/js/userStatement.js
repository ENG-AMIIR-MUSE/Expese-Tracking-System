
 $('#from').attr('disabled',true)
 $('#to').attr('disabled',true)
$('#type').on('change',function(){
    console.log("changed ")
    if($('#type').val() == 0){
       
         $('#from').attr('disabled',true)
         $('#to').attr('disabled',true)

    }
    else{
         $('#from').attr('disabled',false)
         $('#to').attr('disabled',false)
    }
})

$('#statement').on('submit',function(event){
    event.preventDefault()
    $('#statement thead').html('')
    $('#statement tbody').html('')
   let from  =  $('#from').val()
   let to =  $('#to').val()
    $('#to').attr('disabled',true)

    let sendingData = {
        from:from,
        to:to,
        action:'getUserStatement'
    }
    $.ajax({
        method:'POST',
        url:'../api/expense.php',
        dataType:'JSON',
        data:sendingData,
     
        success: function (data) {
            let response = data.data;
            let tr =''
            let th  = ''
            response.forEach((item) => {
                th   = "<tr>"
                for (i in item) {
                    th += `<th> ${i}</th>`
                }
                th += "</tr>"
                tr += "<tr>"
                for (i in item) {
                    tr += "<td> " + item[i] + "</td>"
                }
                tr += "</tr>"
                //    console.log("single row ",tr)
            })
            $('#statement thead').append(th)
            $('#statement tbody').append(tr)
        },
        erro:function(data){
            console.log(data)
        }
    })
})
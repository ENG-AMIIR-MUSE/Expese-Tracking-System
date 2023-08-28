
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
    console.log("submited")
    $('.table thead').html('')
    $('.table tbody').html('')
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
            $('.table thead').append(th)
            $('.table tbody').append(tr)
        },
        erro:function(data){
            console.log(data)
        }
    })
})
$('#print').on('click',function(){
   print()
})
function print(){
    let newWindow = window.open("");
    let pirntArea  = document.querySelector('#print_area')
    newWindow.document.write(`<html><head><title>Print report </title>`);
    newWindow.document.write(`<style media="print">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
    body{
        font-family: 'Poppins', sans-serif;
    }
    table{
        width:100%
    }
    thead,th{
        padding:10px;
       background-color:blue !important;
      
       
    }
     th , td{
        padding:10px !important;
        text-align:left !important;
        
    }
    th,td{
        border-bottom:1px solid gray !important;
       
    }
    </style>`)
    newWindow.document.write('</head><body>')
    newWindow.document.write(pirntArea.innerHTML)
    newWindow.document.write(`</body></html>`)

    newWindow.print()
    newWindow.close()
}
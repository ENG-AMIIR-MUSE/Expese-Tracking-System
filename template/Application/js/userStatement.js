
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
            // console.log("Here is the data form tranaction  :", data)
            let response = data.data;
            // console.log("transaction data  :", data)
            response.forEach((item) => {
                tr = "<tr>"
                for (i in item) {
                    tr += "<td> " + item[i] + "</td>"
                


                }
                tr +=
                    ` <td>
           <a class='btn btn-primary text-white  update' updateInfo = ${item['id']}><i class="fa-solid fa-pen-to-square"></i></a>
           </td> `
                tr +=
                    ` <td>
           <a class='btn btn-danger text-white delete' deleteInfo = ${item['id']}><i class="fa-solid fa-trash"></i></a>
           </td> `

                tr += "</tr>"
                //    console.log("single row ",tr)
                $('#statement tbody').append(tr)
            })
        },
        erro:function(data){
            console.log(data)
        }
    })
    
})
readTransactions()
$("#addNew").on('click',function(){
    console.log('clicked')
$("#modal").show()
})

$('#close').on('click',function(){
    $('#modal').hide()
})

$('#expenseForm').on('submit',function(event){
    event.preventDefault()
   
    // let formData  = new FormData($("#expenseForm")[0])
    let amount  = $('#amount').val()
    let type  = $('#type').val()
    let description  = $('#desc').val()
    let data  = {
        'amount':amount,
        'type':type,
        'descripton':description,
        'action':'registerExpense'
    } 
    $.ajax({
        method:'POST',
        dataType:"JSON",
        url:'../api/expense.php',
        data:data,

        success:function(data){
           let response  = data.data 
           displayMessage("success",response)
     
        },
        error:function(data){
           let response  = data.data 
            displayMessage("error",response)

        }
    })
})

function displayMessage(type,message){
    
    let success  = document.querySelector('.alert-success')
    let error  = document.querySelector('.alert-danger')

    if(type == "success"){
        success.classList = "alert alert-success "
        success.innerHTML = message
        error.classList = "alert alert-danger d-none "
        $('#modal').hide()
        $('#expenseForm')[0].reset()
        setTimeout(()=>{
        $('.alert-success').hide()
        },2000)
    }else{
        error.classList = "alert alert-danger  "
        error.innerHTML = message
        success.classList = "alert alert-success d-none "
        $('#modal').hide()
        $('#expenseForm')[0].reset()

        setTimeout(()=>{
            $('.alert-danger').hide()
            },2000)

    }
}

// read the tranactions 
function readTransactions(){
    let sendngData  = {
        "action":"readAllTransaction"
    }
    $.ajax({
        method:'POST',
        url:'../api/expense.php',
        dataType:'JSON',
        data:sendngData,
        success:function(data){
            console.log("Here is the data form tranaction  :",data)
            let response  = data.data;
            response.forEach((item)=>{
                tr  = "<tr>"
               for(i in item){
                if(i == "type"){
                    //a ustaad shara casil  ui ui ui uilimate rea
                    // safa adsad
                    if(item[i] == "expense"){
                        
                     tr+=  "<td class= 'badge badge-danger'> "+ item[i]+  "</td>"

                    }else{
                tr+=  "<td class='badge badge-success'> "+ item[i]+  "</td>"

                    }
                }

                tr+=  "<td> "+ item[i]+  "</td>"

            }
            tr+=
            ` <td>
           <button class='btn btn-primary update' updateInfo = ${item['std_id']}><i class="fa-solid fa-pen-to-square"></i></button>
           </td> `
           tr+=
            ` <td>
           <button class='btn btn-danger delete' deleteInfo = ${item['std_id']}><i class="fa-solid fa-trash"></i></button>
           </td> `
               tr+= "</tr>"
               console.log("single row ",tr)
               $('#myTable tbody').append(tr)
            })
        },
        error:function(data){
            console.log("here is the error form the transaciton :",data)
        }
    })
}
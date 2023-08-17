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
           console.log(data)
        },
        error:function(data){
           let response  = data.data 
            displayMessage("error",response)
           console.log("data erro",data)

        }
    })
})

function displayMessage(type,message){
    
    let success  = document.querySelector('.alert-success')
    let error  = document.querySelector('.alert-danger')
    console.log(success)
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
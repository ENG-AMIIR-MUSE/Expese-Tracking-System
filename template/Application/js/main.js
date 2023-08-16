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
           alert("data",data)
           
        Swal.fire({
            position: 'top-end',
            icon: 'TransAction  Registered Success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        })
           console.log(data)
        },
        error:function(data){
            alert(data.data)
           console.log(data)

        }
    })
})
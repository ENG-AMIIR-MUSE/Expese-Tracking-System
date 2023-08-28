readTransactions()

let fileImage = document.getElementById('image')
let showImage  = document.getElementById('show')

console.log(fileImage)
console.log(showImage)
console.log("hello from js")


let reader  = new FileReader()
fileImage.addEventListener('onChange',(event)=>{
    let selectedImage  = event.target.files[0]
    reader.readAsDataURL(selectedImage)
})

reader.onload =  (event)=>{
    showImage.src = event.target.result
}
$("#addUsers").on('click', function () {
    
    $("#modal").show()
})

$('#close').on('click', function () {
    $('#modal').hide()
})
let btnAction  = "insert"

$('#expenseForm').on('submit', function (event) {
    event.preventDefault()
    let data  = {}

    // let formData  = new FormData($("#expenseForm")[0])
    
    let id = $('#id').val()
    let amount = $('#amount').val()
    let type = $('#type').val()
    let description = $('#desc').val()
    if(btnAction == "insert"){
         data = {
            'amount': amount,
            'type': type,
            'descripton': description,
            'oper':'insert',
            'action': 'registerExpense'
        }
    }else{
         data = {
            'id':id,
            'amount': amount,
            'type': type,
            'descripton': description,
            'oper':'update',
            'action': 'update'
        }
    }
 
    $.ajax({
        method: 'POST',
        dataType: "JSON",
        url: '../api/expense.php',
        data: data,

        success: function (data) {
            let response = data.data
            console.log("message: ",response)
            displayMessage("success", response)
            readTransactions()
            btnAction = 'insert'


        },
        error: function (data) {
            let response = data
            console.log("message: ",response)

            displayMessage("error", response)

        }
    })
})

function displayMessage(type, message) {
 

    let success = document.querySelector('.alert-success')
    let error = document.querySelector('.alert-danger')

    if (type == "success") {
        success.classList = "alert alert-success "
        success.innerHTML = message
        error.classList = "alert alert-danger d-none "
        $('#modal').hide()
        $('#expenseForm')[0].reset()
        
        setTimeout(() => {
            $('.alert-success').hide()
        }, 1000)
    } else {
        error.classList = "alert alert-danger  "
        error.innerHTML = message
        success.classList = "alert alert-success d-none "
        $('#modal').hide()
        $('#expenseForm')[0].reset()

        setTimeout(() => {
            $('.alert-danger').hide()
        }, 1000)

    }
}

// read the tranactions 
function readTransactions() {
    $("#myTable tbody").html("")
    let sendngData = {
        "action": "readAllTransaction"
    }
    $.ajax({
        method: 'POST',
        url: '../api/expense.php',
        dataType: 'JSON',
        data: sendngData,
        success: function (data) {
            // console.log("Here is the data form tranaction  :", data)
            let response = data.data;
            // console.log("transaction data  :", data)
            response.forEach((item) => {

                // halkaan error iga hatto ha ilawin  also 

                tr = "<tr>"
                for (i in item) {
                    if (i == "type") {

                        //a ustaad shara casil  ui ui ui uilimate rea
                        // safa adsad
                        if (item[i] == "income") {

                            tr += "<td class= 'badge badge-success '> " + item[i] + "</td>"

                        }
                        if (item[i] == "expense") {

                            tr += "<td class= 'badge badge-danger '> " + item[i] + "</td>"

                        }
                    } else {

                        tr += "<td> " + item[i] + "</td>"
                    }


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
                $('#myTable tbody').append(tr)
            })
        },
        error: function (data) {
            console.log("here is the error form the transaciton :", data.data)
        }
    })
}

$('#myTable').on('click', 'a.update', function () {
    // tabel on  click  a.update  on click an anchor tag which has that class 
    // console.log("update is clicked ")

    let id = $(this).attr('updateInfo')

    loadOneTransAction(id)
    $('#modal').show()
})

$("#myTable").on('click','a.delete',function(){
    let id  = $(this).attr('deleteInfo');
    console.log("id",id)
    deleteRecord(id)

})
function deleteRecord(id){
    let sendingData  = {
        id:id,
        oper:'delete',
        action:'delete'
    }
    $.ajax({
        method:'POST',
        url:'../api/expense.php',
        dataType:'JSON',
        data:sendingData,
        success:function(data){
            displayMessage(data.data)
                readTransactions()

            
        },
        error:function(data){
            displayMessage(data.data)
        }
    })

}
function loadOneTransAction(id) {

    let sendingData = {
        action: 'readOneTransaction',
        id: id,
        
    }
    $.ajax({
        method: 'POST',
        url: '../api/expense.php',
        dataType: 'JSON',
        data: sendingData,
        success: function (data) {
            let id = $('#id').val(data.data[0].id)
            let amount = $('#amount').val(data.data[0].amount)
            let type = $('#type').val(data.data[0].type)
            let description = $('#desc').val(data.data[0].description)
            btnAction = "update"
        },
        error: function (data) {
            console.log(data)
        }
    })
}



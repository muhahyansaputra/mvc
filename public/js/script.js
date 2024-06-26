$(function(){
    $('.modal-update').click((e)=>{
        $('.modal-title').html('Update Product')
        $('.modal-footer button[type=submit]').html('Update')

        $('.modal-body form').attr('action', 'http://localhost/phpdasar/mvc/public/products/update')

        const id = e.target.getAttribute('data-idproduct')
        

        $.ajax({
            url : 'http://localhost/phpdasar/mvc/public/products/getDataForUpdate',
            data : {id : id},
            method : 'post',
            dataType : 'json',
            success : function(data){
                $('#name').val(data.name)
                $('#stock').val(data.stock)
                $('#price').val(data.price)
                $('#description').val(data.description)
                $('#id').val(data.product_id)
            }
        })
    })
    
    $('.modal-add').click(()=>{
        $('.modal-title').html('Add Product')
        $('.modal-footer button[type=submit]').html('Save')
        $('.modal-body form').attr('action', 'http://localhost/phpdasar/mvc/public/products/add')
        
        $('#name').val("")
        $('#stock').val("")
        $('#price').val("")
        $('#description').val("")
    })
})
@extends('admin/admin')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="font-size:20px; font-weight:bold;">
                <p style="color:rgb(131, 131, 131)">
                Add product image
                </p>
            </header>
            <div class="panel-body">
                <?php 
        $inform = Session::get('inform');
        if($inform){
            echo '<span class="text-alert">' .$inform .'</span>';
            Session::put('inform', null);
        }
        ?>
                <div class="position-center">
                    <form role="form" enctype="multipart/form-data" method="post" action="{{url('adminPage/saveProductImage')}}">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="product">Product</label>
                            <select id="product" name="product_name" class="form-control input-sm m-bot15">
                                @foreach($product as $key => $product_value)
                                <option value="{{$product_value->product_id}}">{{$key + 1}}. {{$product_value->product_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input accept="image/*" type="file" name="filenames[]" id="imageFile" style="font-size: 1rem;" hidden required>

                            <!-- our custom upload button -->
                            <label class="page-link" style="width:170px; border-radius: 10px; margin-top:10px; padding:12px;" for="imageFile"><i class="fa fa-paperclip" style="float: left;padding-right: 8px; font-size:20px;"></i>Product image *</label></br>
                            <div class="form-group" >
                                <span id="file-chosen">No file chosen</span></br>
                                <u id="myList"></u>
                                <a class="page-link" style="width:65px; border-radius: 10px; margin-top:10px;" id="clear" name="clear" onclick="MyFunction();return false;" href="#">Clear</a>
                                <div id="myImageList"></div>
                                <!--
                                <img style="width:100px;" id="blah" src="#" alt="your image" />
                                -->
                            </div>
                        </div>
                        
                        <button type="submit" name="add_brand" class="btn btn-info">Add</button>
                    </form>
                </div>
            </div>
            <script>
            const actualBtn = document.getElementById('imageFile');

            const fileChosen = document.getElementById('file-chosen');

            let list = document.getElementById("myList");   

            let listImage = document.getElementById("myImageList");

            let data = [];

            actualBtn.addEventListener('change', function() {

                if(data != null){
                    data.forEach((item)=>{
                        let img = document.getElementById("blah");
                        listImage.removeChild(img);
                    })
                }
                /*
                if(data.length > 0){
                    data.forEach((item)=>{
                        let li = document.getElementById("myLi");
                        list.removeChild(li);
                    })
                }
                */
                data=[];
                var temp = this.files.length;
                if(temp == 0){
                    fileChosen.textContent = 'No file chosen';
                }
                for(let i = 0; i < temp;i++){
                    if(temp == 1){
                        fileChosen.textContent = data.push(this.files[i].name) + ' file selected';
                    }
                    else{
                        fileChosen.textContent = data.push(this.files[i].name) + ' files selected';
                    }
                }
                /*
                data.forEach((item)=>{
                    let li = document.createElement("li");
                    li.setAttribute("id", "myLi");
                    li.innerText = item;
                    list.appendChild(li);
                })
                */
                
            });

            imageFile.onchange = evt => {
                let i = 0;

                data.forEach((item) => {
                    let img = document.createElement("img");
                    img.setAttribute("id", "blah");
                    img.setAttribute("src", URL.createObjectURL(imageFile.files[i]));
                    img.setAttribute("alt", "your image");
                    img.setAttribute("style", "width:100px; padding:5px;");
                    listImage.appendChild(img);
                    i++;
                })
            }

            function MyFunction(){ 
                if(data != null){
                    data.forEach((item)=>{
                        let img = document.getElementById("blah");
                        listImage.removeChild(img);
                    })
                }

                data=[];
                fileChosen.textContent = 'No file chosen';
            }

        </script>
        </section>
    </div>
</div>
@endsection
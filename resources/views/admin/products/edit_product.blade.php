@extends('admin/admin')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Update product
            </header>
            <div class="panel-body">
                <div class="position-center">
                    @foreach($edit_product as $key => $edit_value)
                    <form role="form" enctype="multipart/form-data" method="post" action="{{URL::to('adminPage/updateProduct/'.$edit_value->product_id)}}">
                        {{csrf_field()}}  
                        <div class="form-group">
                            <label for="product">Product name</label>
                            <input type="text" value="{{$edit_value->product_name}}" name="product_name" class="form-control" id="product">
                        </div>
                        <div class="form-group">
                            <label for="cate">Category</label>
                            <select id="cate" name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key => $cate_value)
                                @if($cate_value->cate_id == $edit_value->product_cate)
                                <option selected value="{{$cate_value->cate_id}}">{{$cate_value->cate_name}}</option>
                                @else
                                <option value="{{$cate_value->cate_id}}">{{$cate_value->cate_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <select id="brand" name="product_brand" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key => $brand_value)
                                @if($brand_value->brand_id == $edit_value->product_brand)
                                <option selected value="{{$brand_value->brand_id}}">{{$brand_value->brand_name}}</option>
                                @else
                                <option value="{{$brand_value->brand_id}}">{{$brand_value->brand_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Product price</label>
                            <input type="text" value="{{$edit_value->product_price}}" name="product_price" class="form-control" id="product_price">
                        </div>
                        <div class="form-group">
                            <input accept="image/*" type="file" name="filenames[]" id="imageFile" style="font-size: 1rem;" hidden>

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
                                <div style="margin-top:10px;">
                                    <p>Old image</p>
                                </div>
                                <div style="margin-top:10px;">
                                <embed type="{{$edit_value->product_image_mime}}" src='data:{{$edit_value->product_image_mime}};base64,{{base64_encode($edit_value->product_image)}}' width="50" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_content">Product content</label>
                            <textarea style="resize:none" rows="8" class="form-control" name="product_content" id="product_content">{{$edit_value->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="product_description">Product description</label>
                            <textarea style="resize:none" rows="8" class="form-control" name="product_description" id="product_description">{{$edit_value->product_desc}}</textarea>
                        </div>
                        <button type="submit" name="edit_product" class="btn btn-info">Update</button>
                    </form>
                    @endforeach
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
                        console.log(this.files);
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
<form action="{{ URL::to ('/about')}}"  method="POST" enctype="multipart/form-data"  class="checkout__form">                   

                                <br><p><b>Email <span></span></b></p>
                                <input type="hidden" name="_token" value="{{csrf_token()}}" >
                                <input type="text" name="name" value="" >
                                <button type="submit" name="button">CLick Here</button>

                                </div>
                            </div>
</form>
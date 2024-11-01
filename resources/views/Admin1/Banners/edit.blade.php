@extends('Admin1.layouts.master')
@section('contentAdmin')
<section class="sherah-adashboard sherah-show">
    <div class="container">
        <div class="row">
            <div class="col-12 sherah-main__column">
                <div class="sherah-body">
                    <div class="ltr:flex flex-1 rtl:flex-row-reverse">
                        <div class="page-wrapper relative ltr:ms-auto rtl:me-auto rtl:ms-0 w-[calc(100%-260px)] px-4 pt-[64px] duration-300">
                            <div class="xl:w-full">        
                                <div class="flex flex-wrap">
                                    <div class="flex items-center py-4 w-full">
                                        <div class="w-full">                    
                                            <div class="">
                                                <div class="flex flex-wrap justify-between">
                                                    <div class="items-center ">
                                                        <h1 class="font-medium text-3xl block dark:text-slate-100">Update banner</h1>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end container-->
                        
                            <div class="xl:w-full  min-h-[calc(100vh-138px)] relative pb-14"> 
                                <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 justify-between">
                                    <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-6">
                                        <div class="w-full relative mb-4">  
                                          <form action="{{ route('admin-banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="flex-auto p-0 md:p-4">                                   
                                                <div class="mb-2">
                                                    <label for="title" class="font-medium text-sm text-slate-600 dark:text-slate-400">Title :</label>
                                                    <input type="title" name="title" id="title" value="{{ old('title', $banner['title']) }}"
                                                    class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 
                                                    dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 
                                                    placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  
                                                    dark:hover:border-slate-700" placeholder="Title">
                                                    @if ($errors->has('title'))
                                                        <span class="text-red-500 text-sm">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                                <div class="mb-2">
                                                    <label for="content" class="font-medium text-sm text-slate-600 dark:text-slate-400">Content :</label>
                                                    <textarea id="content" name="content" rows="3" 
                                                    class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700" placeholder="Content">
                                                        {{ old('content', $banner['content']) }}    
                                                    </textarea>
                                                    @if ($errors->has('content'))
                                                        <span class="text-red-500 text-sm">{{ $errors->first('content') }}</span>
                                                    @endif
                                                </div>
                                                <div class="mb-2">
                                                    <label for="image" class="font-medium text-sm text-slate-600 dark:text-slate-400">Image :</label>
                                                    @if ($banner->image)
                                                    <img src="{{asset('storage/' . $banner->image)}}" style="max-height: 150 ; max-width: 150"  alt="">
                                                    @else
                                                        Khong co anh
                                                    @endif
                                                    <input type="file" name="image" id="image" value="{{ old('image', $banner['image']) }}" 
                                                    class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700" >
                                                    @if ($errors->has('image'))
                                                        <span class="text-red-500 text-sm">{{ $errors->first('image') }}</span>
                                                    @endif  
                                                </div>
                                                <div class="mb-2">
                                                    <button type="submit" class="px-2 py-2 lg:px-4 bg-brand  text-white text-sm  rounded hover:bg-brand-600 border border-brand-500">Sua banner</button>
                                                    <button class="px-2 py-2 lg:px-4 bg-transparent  text-brand text-sm  rounded transition hover:bg-brand-500 hover:text-white border border-brand font-medium"><a href="{{route('admin-banners.index')}}">Quay lại</a></button>
                                                </div>
                                            </div><!--end card-body--> 
                                          </form>
                                        </div><!--end card-->                                  
                                    </div><!--end col-->                         
                                </div> <!--end grid-->                                        
                                <!-- footer -->
                                    </div>
                                  </div> 
                    
                    
                            </div><!--end container-->
                        </div><!--end page-wrapper-->
                    </div>       





                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
@extends('admin.themes.default.layouts.app')

@section('content')
    @include('admin.themes.default.layouts.header')
@endsection

@section('container-fluid')
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h3 class="mb-0">添加商品</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.good.add')}}">
                        {{csrf_field()}}
                        <h6 class="heading-small text-muted mb-4">基础信息</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">商品标题</label>
                                        <input type="text" class="form-control form-control-alternative" name="title"
                                               value="{{old('title')}}" placeholder="商品名称">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">价格</label>
                                        <input type="text" class="form-control form-control-alternative" name="price"
                                               value="{{old('price')}}" placeholder="{{$currencyUnit}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">排序</label>
                                        <input type="text" name="level" class="form-control form-control-alternative"
                                               value="{{old('level') ? old('level'): 0}}" placeholder="值越大越靠前">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">显示</label>
                                        <select class="custom-select" id="inputGroupSelect02" name="display">
                                            <option value="1">显示</option>
                                            <option value="0">隐藏</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">服务器</label>
                                        <select class="custom-select" id="inputGroupSelect02" name="server">
                                            @if(!empty($servers))
                                                @foreach($servers as $server)
                                                    <option
                                                            value="{{$server->id}}"
                                                            {{old('server') == $server->id ? "checked" : ""}}
                                                    >{{$server->title}}</option>
                                                @endforeach
                                            @endif
                                            <option value="">不配置服务器</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">商品分组</label>
                                        <select class="custom-select" id="inputGroupSelect02" name="categories">
                                            @if(!empty($goods_categories))
                                                @foreach($goods_categories as $category)
                                                    <option
                                                            value="{{$category->id}}"
                                                            {{old('categories') == $category->id ? "checked" : ""}}
                                                    >{{$category->title}}</option>
                                                @endforeach
                                            @endif
                                            <option value="">未分组</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">商品配置</label>
                                        <select class="custom-select" name="configure" id="inputGroupSelect02">
                                            @if(!empty($goodsConfigure))
                                                @foreach($goodsConfigure as $configure)
                                                    <option
                                                            value="{{$configure->id}}"
                                                            {{old('$configure') == $configure->id ? "selected" : ""}}
                                                    >{{$configure->title}}</option>
                                                @endforeach
                                            @endif
                                            <option value="">不配置商品</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <hr class="my-4"/>
                        <h6 class="heading-small text-muted mb-4">更多信息</h6>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">商品简介</label>
                                <textarea rows="4" class="form-control form-control-alternative" name="subtitle"
                                          placeholder="商品的简介/副标题(可为空)">{{old('subtitle')}}</textarea>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-last-name">商品描述</label>
                                <textarea rows="4" class="form-control form-control-alternative" name="description"
                                          placeholder="商品的描述/内容(可为空)">{{old('description')}}</textarea>
                            </div>
                        </div>
                        @include('admin.themes.default.layouts.errors')
                        <input type="submit" class="btn btn-primary" value="添加">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

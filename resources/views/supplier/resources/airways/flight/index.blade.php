@extends('layouts.page')
@section("script")

@endsection

@section('content')
    <div class="page-list">
        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <a href="{{url('/supplier/resources/airways/flight/create/')}}"
                   class="btn btn-primary">新增</a>
            </div>
            <div class="col-xs-4 text-right">

                <form method="get" cssClass="form-horizontal">
                    <div class="input-group">

                        <input type="text" class="form-control" placeholder="关键字"
                               name="key" value=""> <span class="input-group-btn">
								<button class="btn btn-default" type="submit">搜索</button>
							</span>

                    </div>
                </form>
            </div>
        </div>
        <div class="row page-list-body">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li><a href="/supplier/resources/airways/">航空公司</a>
                    </li>
                    <li class="active"><a href="/supplier/resources/airways/flight/">班次管理</a>
                    </li>
                </ul>
                <br/>
                <form method="Post" class="form-inline">

                    <table class="table table-bordered table-hover  table-condensed">
                        <thead>
                        <tr style="text-align: center" class="text-center">
                            <th style="width: 20px"><input type="checkbox"
                                                           name="CheckAll" value="Checkid"/></th>
                            <th style="width: 80px;"><a href="">编号</a></th>
                            <th><a href="">航空公司</a></th>
                            <th><a href="">航向</a></th>
                            <th><a href="">航班号/班次</a></th>
                            <th><a href="">起飞时间</a></th>
                            <th><a href="">到达时间</a></th>
                            <th><a href="">状态</a></th>
                            <th style="width: 120px;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flights as $item)
                            <tr>
                                <td><input type="checkbox" value="{{$item->id}} "
                                           name="id"/></td>
                                <td style="text-align: center">{{$item->id}} </td>
                                <td>{{$item->airways->name}} </td>
                                <td style="text-align: center">{{$item->course}}</td>
                                <td style="text-align: center">{{$item->shift}}</td>
                                <td style="text-align: center">{{$item->departure_time}}</td>
                                <td style="text-align: center">{{$item->arrivala_time}}</td>
                                <td style="text-align: center">
                                    {{$item->state==0?"正常":"禁用"}}</td>

                                <td style="text-align: center"><a
                                            href="{{url('/supplier/resources/airways/flight/edit/'.$item->id)}}">编辑</a>
                                    |
                                    <a
                                            href="{{url('/supplier/resources/airways/flight/delete/'.$item->id)}}">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </form>
            </div>
        </div>
        <div class="row page-list-footer">
            <div class="col-xs-6">
                <button class="btn btn-warning " type="submit" name="Delete"
                        onclick="javascript: return confirm('确定要删除选中的信息吗?');"
                        formaction="delete">批量删除
                </button>
            </div>
            <div class="col-xs-6 text-right">
                {!! $flights->links() !!}
            </div>
        </div>
    </div>
@endsection
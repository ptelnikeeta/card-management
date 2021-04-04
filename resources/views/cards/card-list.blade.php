<table class="table table-bordered">
    <thead>
    <tr>
        <th class="text-center">
            <a  href="{{route('cards',[
                "search"=>request('search'),
                "field"=>"id",
                "sort"=>request('sort','asc')=='asc'?'desc':'asc'
            ])}}">
                <div class="w-auto">
                    <span>ID</span>
                    <span class="fa fa-arrow-{{request('field')=='id'?(request('sort','asc')=='asc'?'up':'down'):''}}"></span>
                </div>
            </a>
        </th>
        <th class="text-center">
            <a  href="{{route('cards',[
                "search"=>request('search'),
                "field"=>"name",
                "sort"=>request('sort','asc')=='asc'?'desc':'asc'
            ])}}">
                <div class="w-auto">
                    <span>Name</span>
                    <span class="fa fa-arrow-{{request('field')=='name'?(request('sort','asc')=='asc'?'up':'down'):''}}"></span>
                </div>
            </a>
        </th>
        <th class="text-center">

                <div class="w-auto">
                    <span>Slug</span>

                </div>
        </th>
        <th class="text-center">

            <div class="w-auto">
                <span>Action</span>

            </div>
        </th>
    </tr>
    </thead>
    <tbody>
    @if( (isset($cards))&&(count($cards) > 0 ) )
        @foreach ($cards as $key=>$cardData)
            <tr>
                <td class="">{{$cardData['id']}}</td>
                <td class="">{{$cardData['name']}}</td>
                <td class="">{{$cardData['slug']}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{route('cards',["id"=>$cardData['id']])}}" type="button" class="btn btn-primary">Edit</a>
                        <a href="{{route('card',["slug"=>$cardData['slug']])}}" type="button" class="btn btn-primary">View</a>
                        <a href="{{route('cardDelete',["id"=>$cardData['id']])}}" type="button" class="btn btn-primary">Delete</a>
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr class="text-center">
            <td colspan="4">No Records.</td>
        </tr>
    @endif
    </tbody>
</table>
{{$cards->links()}}

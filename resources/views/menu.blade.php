<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.2/dist/sketchy/bootstrap.min.css"></head>
<body>
    <div class="container">
        <form action="{{ route('store') }}" method="post">
        <div class="row mb-4">
            <h1>Menukaart</h1>
            <div>
                <p>Selecteer uw tafelnummer</p>
                <select class="form-control" name="table_id" id="">
                    @foreach($seats as $seat)
                        <option value="{{$seat->id}}">{{ $seat->number }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div>
                @foreach($categories as $category)
                <div class="card text-white bg-primary mb-3">
                  <div class="card-header">{{ $category->name }}</div>
                  <div class="card-body">
                    @foreach($category->consumables as $consumable)

                        <h4 class="card-title d-flex justify-content-between">

                            <div>{{ $consumable->name }}</div>

                            <div class="side">
                                <div class="badge bg-info">{{ $consumable->price }} </div>
                                <button id="addBtn-{{$consumable->id}}" class="btn btn-success">+</button>
                            </div>
                        </h4>

                        <p class="card-text"> {{ $consumable->description }} </p>
                    @endforeach
                  </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="order">
            <div class="card border-primary mb-3">
                <div class="card-header">Bestelling</div>
                <div class="card-body">
                    <h4 class="card-title">Uw bestelling:</h4>
                    <div class="card-text">
                        <p class="alert alert-warning">U heeft nog geen producten geselecteerd.</p>

                            @csrf
                            <div id="inputCollection">

                            </div>
                            <input class="btn btn-success" type="submit" value="Bestelling plaatsen">

                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

    <script>

        for(let i = 1; i <= {{$consumableCount}}; i++) {
            document.getElementById('addBtn-'+i)
                .addEventListener('click', function(e){
                    e.preventDefault();
                    let name = e.path[2].firstElementChild.innerText;
                    document.getElementById('inputCollection')
                            .innerHTML += `
                                <input class="form-control" type="text" disabled id="" value="${name}">
                                <input class="form-control" name="consumable[]" type="hidden" id="" value="${i}">
                            `;
                })
        }

    </script>
</body>
</html>

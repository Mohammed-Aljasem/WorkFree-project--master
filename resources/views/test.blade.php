{{--<html>--}}
{{--<head>--}}
{{--    <title>How to Store Multiple Select Values in Database using Laravel? - ItSolutionStuff.com</title>--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-8 offset-2 mt-5">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header bg-info">--}}
{{--                    <h6 class="text-white">How to Store Multiple Select Values in Database using Laravel? - ItSolutionStuff.com</h6>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <form method="post" action="{{ url('test') }}" enctype="multipart/form-data">--}}
{{--                        @csrf--}}

{{--                       --}}
{{--                        <div class="">--}}
{{--                            <label><strong>Select Category :</strong></label><br/>--}}
{{--                            <select class="form-control" name="name[]" multiple="">--}}
{{--                                <option value="php">PHP</option>--}}
{{--                                <option value="react">React</option>--}}
{{--                                <option value="jquery">JQuery</option>--}}
{{--                                <option value="javascript">Javascript</option>--}}
{{--                                <option value="angular">Angular</option>--}}
{{--                                <option value="vue">Vue</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <div class="text-center" style="margin-top: 10px;">--}}
{{--                            <button type="submit" class="btn btn-success">Save</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}

{{--</html>--}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multilpe Select</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<style>
    .mul-select{
        width: 100%;
    }
</style>
<div class="container-fluid h-100 bg-light text-dark">
    <div class="row justify-content-center align-items-center">
        <h1>Select Multilpe</h1>
    </div>
    <br>
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <form action="{{url('test')}}" method="post" onsubmit="validate()">
                @csrf
            <div class="form-group">
                <select class="mul-select" multiple="true" name="name[]" id="selects">
                    <option value="Cambodia">Cambodia</option>
                    <option value="Khmer">Khmer</option>
                    <option value="Thiland">Thiland</option>
                    <option value="Koren">Koren</option>
                    <option value="China">China</option>
                    <option value="English">English</option>
                    <option value="USA">USA</option>
                </select>
            </div>
                <div id="error"></div>
            <div class="form-group">
                <button type="submit">add</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".mul-select").select2({
            placeholder: "select country", //placeholder
            tags: true,
            tokenSeparators: ['/',',',';'," "]
        });
    })
    var count = $("#selects).children('option').length;
    console.log(count);
    function validate()
    {
        var selectChoose = document.getElementById('selects');
        var maxOptions = 2;
        var optionCount = 0;
        for (var i = 0; i < selectChoose.length; i++) {
            if (selectChoose[i].selected) {
                optionCount++;
                if (optionCount > maxOptions) {
                  e.preventDefault()
                    return false;
                }
            }
        }
        return true;
    }

</script>
</body>
</html>

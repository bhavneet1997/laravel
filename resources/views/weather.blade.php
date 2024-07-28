<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        margin-bottom: 60px;
        /* Height of the footer */
    }

    .footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        height: 60px;
        /* Height of the footer */
        background-color: #f5f5f5;
    }

    p.card-text {
        margin-top: -10px;
    }
    </style>
</head>

<body>
    <!-- {{print_r($data)}} -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Weather App</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5 mb-4">Weather Application</h1>
        <div class="input-group mb-3">
            <form action="{{route ('weather.form') }}" method="post" class="form-inline">
            @csrf
              
                <div class="d-flex">
                    <div class="form-group">
                        <select class="form-select" name="city" id="city">
                            <option value="-1">-- Select City --</option>
                            <option value="Port Blair">Port Blair</option> 
                            <option value="Adoni">Adoni</option> 
                            <option value="Itanagar">Itanagar</option> 
                            <option value="Dhuburi">Dhuburi</option> 
                            <option value="Ara">Ara</option> 
                            <option value="Delhi">Delhi</option> 
                            <option value="Ambikapur">Ambikapur</option>   
                            <option value="Daman">Daman</option>    
                            <option value="Alipore">Alipore</option>   
                            <option value="london">London</option> 
                            <option value="ludhiana">Ludhiana</option> 
                        </select>
                    </div>
                    <button style="margin-left: 20px;" class="btn btn-primary">Search</button>
                </div>
            </form>

        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Looks Like</h5>
                        <br>
                        <b>
                        @if(isset($data["current"]["condition"]["text"])&&
                        $data["current"]["condition"]["text"]==="Light rain shower")  
                      <img src="/images/Lightrainshower.png" alt="">

                      @elseif (isset($data["current"]["condition"]["text"])&&
                      $data["current"]["condition"]["text"]==="Thundery outbreaks in nearby") 
                      <img src="/images/thundryotbreak.jpeg" alt="">
                     
                      @elseif(isset($data["current"]["condition"]["text"])&&
                      $data["current"]["condition"]["text"]==="Patchy light rain in area with thunder") 
                      <img src="/images/thundryotbreak.jpeg" alt="">
                    
                      @elseif(isset($data["current"]["condition"]["text"])&&
                      $data["current"]["condition"]["text"]==="Moderate rain") 
                      <img src="/images/moderate.png" alt="">

                      @elseif(isset($data["current"]["condition"]["text"])&&
                      $data["current"]["condition"]["text"]==="Moderate or heavy rain shower") 
                      <img src="/images/moderateorheavy.png" alt="">
                     
                      @elseif(isset($data["current"]["condition"]["text"])&&
                      $data["current"]["condition"]["text"]==="Heavy rain") 
                      <img src="/images/heavy.png" alt="">

                      @elseif(isset($data["current"]["condition"]["text"])&&
                      $data["current"]["condition"]["text"]==="Patchy rain nearby") 
                      <img src="/images/heavy.png" alt="">
                     
                      @elseif(isset($data["current"]["condition"]["text"])&&
                      $data["current"]["condition"]["text"]==="Sunny") 
                      <img src="/images/sunny.png" alt="">

                      @elseif(isset($data["current"]["condition"]["text"])&&
                      $data["current"]["condition"]["text"]==="Partly Cloudy") 
                      <img src="/images/partly_cloud.png" alt="">
                    
                        @endif 

                        </b>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location Details</h5>
                        <br>
                        <p class="card-text">Country: 
                            <b>
                        @if(isset($data["location"]["country"]))
                        {{$data["location"]["country"]}}   
                        @else
                        -- 
                        @endif
                    </b>
                    </p>
                        <p class="card-text">Name: <b>
                        @if(isset($data["location"]["name"]))
                        {{$data["location"]["name"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Latitude: <b>
                        @if(isset($data["location"]["lat"]))
                        {{$data["location"]["lat"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Longitude: <b>
                        @if(isset($data["location"]["lon"]))
                        {{$data["location"]["lon"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Sunrise: <b>
                        @if(isset($data  ["forecast"] ["forecastday"]["0"]["astro"]["sunrise"]))
                        {{$data ["forecast"] ["forecastday"]["0"]["astro"]["sunrise"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Sunset: <b>
                        @if(isset($data["forecast"] ["forecastday"]["0"]["astro"]["sunset"]))
                        {{$data["forecast"] ["forecastday"]["0"]["astro"]["sunset"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Temperature  &deg; F</h5>
                        <br>
                        <p class="card-text">Temp: <b>
                        @if(isset($data ["current"]["temp_f"]))
                        {{$data["current"]["temp_f"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Min Temp: <b>
                        @if(isset($data["forecast"]["forecastday"]["0"] ["day"]["mintemp_f"]))
                        {{$data["forecast"]["forecastday"]["0"]["day"]["mintemp_f"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Max Temp: <b>
                        @if(isset($data["forecast"]["forecastday"]["0"]["day"]["maxtemp_f"]))
                        {{$data["forecast"]["forecastday"]["0"]["day"]["maxtemp_f"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Feels Like: <b>
                        @if(isset($data["current"]["feelslike_f"]))
                        {{$data["current"]["feelslike_f"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Precipitation &percnt;</h5>
                        <br>
                        <p class="card-text">Humidity: <b>
                        @if(isset($data["current"]["humidity"]))
                        {{$data["current"]["humidity"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Pressure: <b>
                        @if(isset($data["current"]["pressure_in"]))
                        {{$data["current"]["pressure_in"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Sea Level: <b>
                        @if(isset($data["current"]["humidity"]))
                        {{$data["current"]["humidity"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Ground Level: <b>
                        @if(isset($data["current"]["humidity"]))
                        {{$data["current"]["humidity"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Visibility: <b>
                        @if(isset($data["current"]["humidity"]))
                        {{$data["current"]["humidity"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Wind m/h</h5>
                        <br>
                        <!-- <p class="card-text">Speed: <b>--</b></p> -->
                        <p class="card-text">Degree: <b>
                        @if(isset($data["current"]["wind_degree"]))
                        {{$data["current"]["wind_degree"]}}   
                        @else
                        -- 
                        @endif
                        </b></p>
                        <p class="card-text">Gust: <b>
                        @if(isset($data["forecast"] ["forecastday"]["0"]["hour"]["0"]["gust_kph"]))
                        {{$data["forecast"] ["forecastday"]["0"]["hour"]["0"]["gust_kph"]}}   
                        @else
                        -- 
                        @endif
                       
                           </b></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br><br>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2024 bk Weather App. All rights reserved.</span>
        </div>
    </footer>
</body>

</html>
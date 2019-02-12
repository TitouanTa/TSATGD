@extends("template")

@section("tittle")
Documents
@stop

@section("content")
<div class="gtco-section">
        <div class="gtco-container">
            <div class="row row-pb-md">
               
                <div class="col-md-5 col-md-push-1 animate-box">
                   
                    <div class="gtco-contact-info">
                  
                    <h2 >Documents en libre consultation</h2>
               <table>
              <thead class="panel-body">
                <tr>
                  <th style="text-align:center">Titre</th>
                  <th style="text-align:center">Fichier</th>
               
                </tr>

              </thead>
              <tbody>



                @foreach ($tab_docs as $unDoc)



                 <td class="col-md-1 col-md-offset-4 ">
                    {{ $unDoc["titre"] }}
                  </td >
                  <td class="col-md-5" >
                      <a href="{{ url('doc/') ."/". $unDoc["contenu"] }}" target="_blank" >{{ $unDoc["contenu"]}}</a> 
                  </td>
                </tr>

              @endforeach
            </tbody>
          </table>


                    </div>


                </div>
            </div>
            </div>
           
        </div>

     

@stop

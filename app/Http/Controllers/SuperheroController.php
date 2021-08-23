<?php


namespace App\Http\Controllers;


use App\Http\Requests\CreationSuperheroRequest;
use App\Http\Resources\SuperheroResource;
use App\Models\Image;
use App\Models\Superhero;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class SuperheroController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $superhero = Superhero::orderBy('id', 'DESC')->paginate(5);
        return response()->json(SuperheroResource::collection($superhero));
    }


    public function store(Request $request)
    {
        $superHero = Superhero::create($request->post());

        foreach ($request->file('images') as $image) {
            $filename = time().rand(1,10). '.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $filename);
            Image::create([
                'image_name' => $filename,
                "superhero_id" => $superHero->id
            ]);
        }

        return $superHero;
    }



    public function show(Superhero $superhero)
    {
        return  response()->json(new SuperheroResource($superhero));
    }

    public function edit(Request $request, Superhero $superhero)
    {
        $superhero->update($request->input());
        foreach ($request->file('images') as $image) {
            $filename = time().rand(1,10). '.'.$image->getClientOriginalExtension();
            $image->move('uploads/', $filename);
            Image::create([
                'image_name' => $filename,
                "superhero_id" => $superhero->id
            ]);
        }
        return response()->json(new SuperheroResource($superhero));
    }
    public function destroy(Superhero $superhero)
    {
        $superhero->delete();
        return response()->noContent();
    }
    public function getPostsBySuperheroNickname(Request $request){
        $superhero = Superhero::where('nickname',$request->route('nickname')) -> first();
        return new SuperheroResource($superhero);
    }
}

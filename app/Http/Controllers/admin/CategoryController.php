use App\Models\Category;

public function index()
{
    $categories = Category::latest()->get();
    return view('admin.categories.index', compact('categories'));
}

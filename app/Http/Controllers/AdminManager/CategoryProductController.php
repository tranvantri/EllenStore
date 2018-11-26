<?php
namespace App\Http\Controllers\AdminManager;
use App\Http\Requests\CategoryProductRequest;
use Illuminate\Http\Request;
use App\CategoryGroup;
use App\CategoryProduct;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
class CategoryProductController extends Controller
{
    public function getList()
    {
        $catePro = CategoryProduct::all();
        return view('admin.categoryproduct.list',compact('catePro'));
    }

    /*-------------- Add new ------------------------------*/
    public function getAdd()
    {
        $catePro = CategoryProduct::all();
        $cateGroup = CategoryGroup::all();  
        return view('admin.categoryproduct.add',compact('catePro','cateGroup'));
    }

    public function createArrayData(CategoryProduct $cate)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $data = array(            
            'name' => $cate->name,
            'categroupname' => $cate->category_group->name,
            'status' => $cate->enable,
            'sale' => $cate->sale, 
            'start_date_sale' => $cate->start_date_sale, 
            'end_date_sale' => $cate->end_date_sale,
            'sale_img' => $cate->sale_img, 

        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );
        $result = array();
        array_push($result, $temp);
            
        return $result;
    }

    public function postAdd(CategoryProductRequest $req)
    {
        $catePro = new CategoryProduct;
        $catePro->name = $req->Ten;
        $catePro->idCategoryGroup = $req->NhomDanhMuc;

        $catePro->sale = $req->sale;
        $catePro->start_date_sale = date ("Y-m-d H:i:s", strtotime($req->start_date_sale));
        $catePro->end_date_sale = date ("Y-m-d H:i:s", strtotime($req->end_date_sale));
        $catePro->sale_img = $req->sale_img;

        $catePro->enable = $req->enable;

        $arrayData = $this->createArrayData($catePro);    
        $arrayData = json_encode($arrayData);
        
        $catePro->history = $arrayData;
        $catePro->save();
       
        return redirect('admin/categoryproduct/add')->with('thongbao','Thêm thành công!');
    }

    /*---------------Edit Item ----------------------------------*/
    public function getEdit($id)
    {
        $catePro = CategoryProduct::find($id);
        $cateGroup = CategoryGroup::all();

        return view('admin.categoryproduct.edit',compact('catePro','cateGroup'));
    }

    public function editArrayData(CategoryProduct $cate)
    {
        $actor = array(
            'id' => Auth('admin')->user()->id,
            'name' => Auth('admin')->user()->name,
            'phone' => Auth('admin')->user()->phone,
            'date' => date("d-m-Y H:i:s"),
        );

        $data = array(            
            'name' => $cate->name,
            'categroupname' => $cate->category_group->name,
            'status' => $cate->enable,
            'sale' => $cate->sale, 
            'start_date_sale' => $cate->start_date_sale, 
            'end_date_sale' => $cate->end_date_sale,
            'sale_img' => $cate->sale_img,            
        );
        $temp = array(
            'actor' => $actor, 
            'data' => $data,
        );                   
        return $temp;
    }

    public function postEdit(CategoryProductRequest $req,$id)
    {
        $catePro = CategoryProduct::find($id);
        $catePro->name = $req->Ten;
        $catePro->idCategoryGroup = $req->NhomDanhMuc;
        $catePro->enable = $req->enable;
        $catePro->sale = $req->sale;
        $catePro->start_date_sale = date ("Y-m-d H:i:s", strtotime($req->start_date_sale));
        $catePro->end_date_sale = date ("Y-m-d H:i:s", strtotime($req->end_date_sale));
        $catePro->sale_img = $req->sale_img;

        $oldData = json_decode($catePro->history, true);
        
        $newData = $this->editArrayData($catePro);
        array_push($oldData, $newData);
        $oldData = json_encode($oldData);

        $catePro->history = $oldData;
        $catePro->save();
       
        return redirect('admin/categoryproduct/edit/'.$id)->with('thongbao','Sửa thành công!');
    }
    public function getDelete($id)
    {
        $catePro= CategoryProduct::find($id);
        try {
            $check = $catePro->delete();
            if(!$check)
                throw new QueryException;
        } catch (QueryException $e) {
            return redirect('admin/categoryproduct/list')->with('loi','Không thể xóa!');
        }
        
        return redirect('admin/categoryproduct/list')->with('thongbao','Xóa thành công!');
    }


    public function getHistory($id)
    {
        $cate= CategoryProduct::find($id);
        $data =  json_decode($cate->history, true);
        $flag = true;
        foreach ($data as $key => $value) { 
            if($flag == true){
                $temp = "<td style='color: blue'>Tạo mới</td>";
            } else{
                $temp = "<td style='color: green'>Chỉnh sửa</td>";
            }      
            if($value['data']['status'] == 1){
                $temp2 = "<td style='color: blue'>Đang hoạt động...</td>";
            } else{
                $temp2 = "<td style='color: red'>Ngưng hoạt động</td>";
            }   
            echo "<tr class='odd gradeX' align='center'>
                        <td>".$value['actor']['id']."</td>
                        <td style='font-weight: bold;'>".$value['actor']['name']."</td>          
                        <td>".$value['actor']['phone']."</td>
                        ".$temp."           
                        <td>".$value['data']['name']."</td>
                        <td>".$value['data']['categroupname']."</td>
                        <td>".$value['data']['sale']."</td>
                        <td>".date ("d-m-Y H:i:s", strtotime($value['data']['start_date_sale']))."</td>
                        <td>".date ("d-m-Y H:i:s", strtotime($value['data']['end_date_sale']))."</td>
                        <td>
                            <a target='_blank' href='".$value['data']['sale_img']."'>
                              <img class='img-avatar' src='".$value['data']['sale_img']."'> <i class='fa fa-external-link' aria-hidden='true'></i>
                            </a>                            
                        </td>
                        ".$temp2."   
                        <td>".$value['actor']['date']."</td>               
                    </tr>";
            $flag = false; 
        }      
    }
}

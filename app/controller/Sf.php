<?php
namespace App\Controller;
use App\Controller\Base;
use App\Model\Members;
class Sf extends Base
{
    public function select($request, $response, $args)
    {
       //echo 'aaa';exit;
        $arr = [5,6,2,4,7,4,5,10,3,55,38];

        //选择
        /**
         *思路：每次确定一个最大或最小值放入队列
         *
         */
        for($i = 0;$i<count($arr);$i++) //每次循环确定一个位置，时间复杂度为O(n^2)
        {
            for($j=$i+1;$j<count($arr);$j++)
            {
                if($arr[$i]>$arr[$j])
                {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        echo '<pre>';
        print_r($arr);
    }
    //读出一个数值 ，放入数组
    public function parsenum()
    {
        $num = 143689;
        $this->arr = [];
        $arr = $this->func_parsenum($num);
        var_dump($this->arr);
    }

    private function func_parsenum($num)
    {
        if($num<1)
        {
            return $this->arr;
        }
        $ys = ($num%10);
        $this->arr[] = $ys;
        $this->func_parsenum($num/10);
    }

    //冒泡排序
    public function poup()
    {
        /**
         * 相邻两个进行比较，较小的往前移，类似水泡冒出
         */
        $arr = [5,6,2,4,7,4,5,10,3,55,38];
        $size = count($arr);
        for($i=$size-1; $i>=1 ; $i--)
        {
            for($j=$i ; $j>=$size-$i; $j--)
            {
                if($arr[$j]<$arr[$j-1])
                {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j-1];
                    $arr[$j-1] = $temp;
                }
            }
        }
        echo '<pre>';
        var_dump($arr);
        return $arr;
    }

    //
    public function insert()
    {
        /**
         *通俗的讲是从第二个元素开始，与前面所有的元素进行比较，比较的规则是
         * 从相邻的开始往前推进，如果这个元素比前面的小，那么前面这个元素往前
         * 移一位，空出这个位置来，再继续往前推进，直到这个元素比前面某个元素
         * 大的时候，这时候把个元素插入空出的那个空位中
         *
         */
        //echo 'bbb';
        $arr = [5,6,2,4,7,4,5,10,3,55,38];
        $size = count($arr);
        for($i=1;$i<$size;$i++)
        {
            //定义要插入的元素
            $tmp = $arr[$i];
            $k = $i-1;//从此元素前一个开始试
            //如果此元素比前一个元素小
            while($k>=0&&$tmp<$arr[$k])
            {
                $arr[$k+1] = $arr[$k];//把k位置上的数向后移一们，因为这个数肯定会插在k前面的
                $k--; //继续比较,直到不符合条件
            }

            if(($k+1) != $i) //如果是第一次就不符合条件的话，不用进行任何操作直接进入下个元素
            {
                $arr[$k+1] = $tmp; //这个是找到的那符合条件的位置 ，因为循环中最后多减了一次，这里加上。
            }

        }

        echo '<pre>';
        print_r($arr);
    }

    //fast sort
    public function fast()
    {
        $arr = [5,6,2,4,7,4,5,10,3,55,38];
        $fast = $this->func_fast($arr);
        echo '<pre>';
        print_r($fast);
    }

    private function func_fast($arr)
    {
        //先取一个基准
        $flag = $arr[0];
        $left = [];
        $right = [];

        //以第第一个元素为基准，把数组分到两边。
        for($i=0;$i<count($arr);$i++)
        {
            if($flag>$arr[$i])
                $left[] = $arr[$i];
            elseif($flag<$arr[$i])
                $right[] = $arr[$i];
            else
                return ;
        }
        $this->func_fast($left);
        $this->func_fast($right);
        return array_merge($left,[$flag],$right);
    }
}
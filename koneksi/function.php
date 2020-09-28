<?php 
function get_data($selected = array())
{
    include 'koneksi/koneksi.php';
    $rows = mysqli_query($koneksi,"SELECT r.Kd_penyakit, r.Kd_gejala,  r.nilai  
        FROM hamapenyakit r  
        WHERE r.Kd_gejala IN ('".implode("','", $selected)."') ORDER BY r.Kd_penyakit, r.Kd_gejala");
    $data = array();
    foreach($rows as $row)
    {
        $data[$row['Kd_penyakit']][$row['Kd_gejala']] = $row['nilai'];        
    }
    return $data;
}

function bayes($data = array(), $bobot = array())
{
    $result = array();
    foreach($data as $key => $val)
    {
        $result['kali'][$key] = $bobot[$key]['bobot'];
        foreach($val as $k => $v)
        {
            $result['kali'][$key]*=$v;
        }
    }
    
    $result['total'] = array_sum($result['kali']);
    foreach($result['kali'] as $key => $val)
    {
        $result['hasil'][$key] = $val / $result['total'];
    }
    
    return $result;
}
?>
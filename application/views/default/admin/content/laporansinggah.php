 <table width="100%"  border="1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NAMA TEMPAT SINGGAH</th>
                                            <th>WAKTU</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    $query = $this->db->query("SELECT * FROM singgah");
                                    foreach ($query->result() as $row){ 
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no; ?></td>
                                            <td align="center"><?php echo $row->nama_singgah; ?></td>
                                            <td align="center"><?php echo $row->waktu; ?></td>
                                            <td align="center"><?php echo $row->status; ?></td>
                                           </tr>
                                     <?php $no++; } ?>
                                    </tbody>
                                </table>
public interface IDAO {

	public function insert($object, $conn);
	public function delete($id, $conn);
	public function select($id, $conn);
}
